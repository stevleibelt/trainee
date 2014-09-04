
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- trainee_orm_propel1album
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS trainee_orm_propel1album;

CREATE TABLE trainee_orm_propel1album
(
    id INTEGER(11) NOT NULL,
    interpret_id INTEGER(11) NOT NULL,
    title VARCHAR(40) NOT NULL,
    number_of_tracks TINYINT(2) NOT NULL,
    PRIMARY KEY (id,interpret_id),
    INDEX trainee_orm_propel1album_I_1 (title),
    INDEX trainee_orm_propel1album_FI_1 (interpret_id),
    CONSTRAINT trainee_orm_propel1album_FK_1
        FOREIGN KEY (interpret_id)
        REFERENCES trainee_orm_propel1interpret (id)
) ENGINE=InnoDB CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- trainee_orm_propel1interpret
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS trainee_orm_propel1interpret;

CREATE TABLE trainee_orm_propel1interpret
(
    id INTEGER(11) NOT NULL,
    name VARCHAR(80) NOT NULL,
    is_sampler TINYINT(1) NOT NULL,
    PRIMARY KEY (id),
    INDEX trainee_orm_propel1interpret_I_1 (name),
    INDEX trainee_orm_propel1interpret_I_2 (is_sampler)
) ENGINE=InnoDB CHARACTER SET='utf8';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;


# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- trainee_orm_propel1_album
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS trainee_orm_propel1_album;

CREATE TABLE trainee_orm_propel1_album
(
    id INTEGER(11) NOT NULL AUTO_INCREMENT,
    interpret_id INTEGER(11) NOT NULL,
    title VARCHAR(40) NOT NULL,
    number_of_tracks TINYINT(2) NOT NULL,
    PRIMARY KEY (id,interpret_id),
    INDEX title (title),
    INDEX trainee_orm_propel1_album_FI_1 (interpret_id),
    CONSTRAINT trainee_orm_propel1_album_FK_1
        FOREIGN KEY (interpret_id)
        REFERENCES trainee_orm_propel1_interpret (id)
) ENGINE=InnoDB CHARACTER SET='utf8';

-- ---------------------------------------------------------------------
-- trainee_orm_propel1_interpret
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS trainee_orm_propel1_interpret;

CREATE TABLE trainee_orm_propel1_interpret
(
    id INTEGER(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(80) NOT NULL,
    is_sampler TINYINT(1) NOT NULL,
    PRIMARY KEY (id),
    INDEX name (name),
    INDEX is_sampler (is_sampler)
) ENGINE=InnoDB CHARACTER SET='utf8';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;

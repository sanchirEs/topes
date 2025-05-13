-- -----------------------------------------------------
-- 1) Drop/Create Database
-- -----------------------------------------------------
DROP DATABASE IF EXISTS topes_db;
CREATE DATABASE topes_db
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_unicode_ci;
USE topes_db;


-- -----------------------------------------------------
-- 7) Product Categories
-- -----------------------------------------------------
CREATE TABLE product_categories (
    id           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name         VARCHAR(100)  NOT NULL,
    slug         VARCHAR(100)  NOT NULL UNIQUE,
    description  TEXT          DEFAULT NULL,
    status       TINYINT(1)    NOT NULL DEFAULT 1,
    created_at   TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at   TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP
                              ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- 😎 Products
-- -----------------------------------------------------
CREATE TABLE products (
    id                    INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_category_id   INT UNSIGNED NOT NULL,
    name                  VARCHAR(255) NOT NULL,
    slug                  VARCHAR(255) NOT NULL UNIQUE,
    description           TEXT         DEFAULT NULL,
    image                 VARCHAR(255) DEFAULT NULL,
    price                 DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    status                TINYINT(1)   NOT NULL DEFAULT 1,
    created_at            TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at            TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP
                                         ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_products_category
        FOREIGN KEY (product_category_id)
        REFERENCES product_categories(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- 9) Product Reviews
--    No user table; store basic reviewer info (name/email) if desired
-- -----------------------------------------------------
CREATE TABLE product_reviews (
    id             INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_id     INT UNSIGNED NOT NULL,
    reviewer_name  VARCHAR(255) DEFAULT NULL,
    rating         TINYINT UNSIGNED DEFAULT NULL,
    review_text    TEXT         DEFAULT NULL,
    status         TINYINT(1)   NOT NULL DEFAULT 1,
    created_at     TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at     TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP
                                   ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_reviews_product
        FOREIGN KEY (product_id)
        REFERENCES products(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- 10) Product Questions
--     No user table; store asker's name/email, plus an answered_by text
-- -----------------------------------------------------
CREATE TABLE product_questions (
    id            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_id    INT UNSIGNED NOT NULL,
    asker_name    VARCHAR(255) DEFAULT NULL,
    question_text TEXT         DEFAULT NULL,
    answer_text   TEXT         DEFAULT NULL,
    answered_by   VARCHAR(255) DEFAULT NULL,
    status        TINYINT(1)   NOT NULL DEFAULT 0,
    created_at    TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    answered_at   TIMESTAMP    NULL     DEFAULT NULL,
    updated_at    TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP
                                   ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_questions_product
        FOREIGN KEY (product_id)
        REFERENCES products(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- 11) Partners
--     Table to showcase partners or sponsors
-- -----------------------------------------------------
CREATE TABLE partners (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,         -- partner or sponsor name
    logo VARCHAR(255) NULL,            -- path to partner's logo image
    link VARCHAR(255) NULL,            -- optional URL to partner's site
    status TINYINT(1) NOT NULL DEFAULT 1, -- 1=active, 0=inactive
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Done
-- -----------------------------------------------------

/*
  NOTES:
  1) Removed all references to roles/users. 
  2) Each table that previously referenced a user now:
       - Has a simple text field for name/author (e.g. author_name, reviewer_name).
       - You may also add optional email columns if needed (commenter_email, etc.).
  3) For real-world usage, secure your admin access with a separate system or 
     simple authentication logic that does not require user tables in this DB.
  4) You can store actual image/video files in the public folder, referencing 
     them via "image", "logo", "featured_image", etc. in the DB.
  5) Foreign keys remain for relationships between blog_posts <-> categories, 
     comments <-> posts, products <-> categories, etc.
*/ 
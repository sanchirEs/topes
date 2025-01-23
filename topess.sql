-- -----------------------------------------------------
-- 1) Drop/Create Database
-- -----------------------------------------------------
DROP DATABASE IF EXISTS topes_db;
CREATE DATABASE topes_db;
USE topes_db;

-- -----------------------------------------------------
-- 2) Services Table
--    Basic table to hold services offered by the company
-- -----------------------------------------------------
CREATE TABLE services (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,  -- Typically unique for SEO-friendly URLs
    description TEXT NOT NULL,
    image VARCHAR(255) NULL,           -- path to the service image
    status TINYINT(1) NOT NULL DEFAULT 1,  -- 1=active/visible, 0=inactive
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- 3) Blog Categories
-- -----------------------------------------------------
CREATE TABLE blog_categories (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,  -- Typically unique so URLs don't collide
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- 4) Blog Posts
-- -----------------------------------------------------
CREATE TABLE blog_posts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    author_name VARCHAR(255) NOT NULL,       -- store admin or author name
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,       -- unique for SEO-friendly URLs
    content TEXT NOT NULL,
    featured_image VARCHAR(255) NULL,        -- path to blog's featured image
    status TINYINT(1) NOT NULL DEFAULT 1,    -- 1=published, 0=draft/hidden
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- 5) Pivot Table: Many-to-Many for Blog Posts & Categories
-- -----------------------------------------------------
CREATE TABLE blog_post_category (
    blog_post_id INT UNSIGNED NOT NULL,
    blog_category_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (blog_post_id, blog_category_id),

    CONSTRAINT fk_bpc_post FOREIGN KEY (blog_post_id)
        REFERENCES blog_posts(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    CONSTRAINT fk_bpc_cat FOREIGN KEY (blog_category_id)
        REFERENCES blog_categories(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- 6) Blog Comments
--    No user table; store commenter name and/or email if needed
-- -----------------------------------------------------
CREATE TABLE blog_comments (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    blog_post_id INT UNSIGNED NOT NULL,
    commenter_name VARCHAR(255) NOT NULL,  -- or make this NULL if optional
    content TEXT NOT NULL,
    status TINYINT(1) NOT NULL DEFAULT 1,  -- 1=approved, 0=unapproved/hidden
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_blog_comments_post_id FOREIGN KEY (blog_post_id)
        REFERENCES blog_posts(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- 7) Product Categories
-- -----------------------------------------------------
CREATE TABLE product_categories (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,   -- Typically unique for SEO-friendly URLs
    description TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- 😎 Products
-- -----------------------------------------------------
CREATE TABLE products (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_category_id INT UNSIGNED NOT NULL,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,   -- Typically unique for product pages
    description TEXT NOT NULL,
    image VARCHAR(255) NULL,            -- path to the product's main image
    price DECIMAL(10,2) DEFAULT 0.00,
    status TINYINT(1) NOT NULL DEFAULT 1,   -- 1=active, 0=inactive
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_products_category_id FOREIGN KEY (product_category_id)
        REFERENCES product_categories(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- 9) Product Reviews
--    No user table; store basic reviewer info (name/email) if desired
-- -----------------------------------------------------
CREATE TABLE product_reviews (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_id INT UNSIGNED NOT NULL,
    reviewer_name VARCHAR(255) NOT NULL,
    rating TINYINT UNSIGNED NOT NULL,       -- e.g., 1-5 stars
    review_text TEXT NOT NULL,
    status TINYINT(1) NOT NULL DEFAULT 1,   -- 1=approved, 0=pending/hidden
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_reviews_product_id FOREIGN KEY (product_id)
        REFERENCES products(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- 10) Product Questions
--     No user table; store asker's name/email, plus an answered_by text
-- -----------------------------------------------------
CREATE TABLE product_questions (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_id INT UNSIGNED NOT NULL,
    asker_name VARCHAR(255) NOT NULL,       -- who asked
    question_text TEXT NOT NULL,
    answer_text TEXT NULL,                 -- admin's answer
    answered_by VARCHAR(255) NULL,         -- which admin answered (store as text)
    status TINYINT(1) NOT NULL DEFAULT 0,  -- 0=pending, 1=answered, etc.
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    answered_at TIMESTAMP NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_questions_product_id FOREIGN KEY (product_id)
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
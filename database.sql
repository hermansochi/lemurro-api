-- Наборы прав доступа
CREATE TABLE IF NOT EXISTS `access_sets`
(
    `id`         INT          NOT NULL AUTO_INCREMENT,
    `name`       VARCHAR(255) NOT NULL,
    `roles`      TEXT,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `deleted_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- Коды аутентификации
CREATE TABLE IF NOT EXISTS `auth_codes`
(
    `id`         BIGINT       NOT NULL AUTO_INCREMENT,
    `auth_id`    VARCHAR(255) NOT NULL,
    `code`       VARCHAR(255) NOT NULL,
    `ip`         VARCHAR(255) NOT NULL DEFAULT '',
    `user_id`    INT          NOT NULL,
    `attempts`   TINYINT      NOT NULL DEFAULT '0',
    `created_at` DATETIME,
    PRIMARY KEY (`id`),
    UNIQUE KEY (`auth_id`)
) ENGINE = InnoDB;

-- Дата последнего запроса кода аутентификации
CREATE TABLE IF NOT EXISTS `auth_codes_lasts`
(
    `id`         BIGINT   NOT NULL AUTO_INCREMENT,
    `user_id`    INT      NOT NULL,
    `created_at` DATETIME NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- Лог действий пользователей
CREATE TABLE IF NOT EXISTS `data_change_logs`
(
    `id`          BIGINT       NOT NULL AUTO_INCREMENT,
    `user_id`     INT          NOT NULL,
    `table_name`  VARCHAR(255) NOT NULL,
    `action_name` VARCHAR(255) NOT NULL,
    `record_id`   INT,
    `data`        LONGTEXT,
    `created_at`  DATETIME,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- Пример раздела
CREATE TABLE IF NOT EXISTS `example`
(
    `id`         INT NOT NULL AUTO_INCREMENT,
    `name`       VARCHAR(255),
    `files`      TEXT,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `deleted_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

INSERT INTO `example`
SET `name`       = 'Пример раздела №1',
    `created_at` = '2018-10-28 00:00:00';

INSERT INTO `example`
SET `name`       = 'Пример раздела №2',
    `created_at` = '2018-10-28 00:00:00';

-- Файлы
CREATE TABLE IF NOT EXISTS `files`
(
    `id`             INT          NOT NULL AUTO_INCREMENT,
    `path`           VARCHAR(255) NOT NULL,
    `name`           VARCHAR(255) NOT NULL,
    `ext`            VARCHAR(255) NOT NULL,
    `container_type` VARCHAR(255) NOT NULL,
    `container_id`   VARCHAR(255),
    `created_at`     DATETIME,
    `deleted_at`     DATETIME,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- Токены скачивания файлов
CREATE TABLE IF NOT EXISTS `files_downloads`
(
    `id`         INT          NOT NULL AUTO_INCREMENT,
    `type`       VARCHAR(255) NOT NULL,
    `path`       VARCHAR(255) NOT NULL,
    `name`       VARCHAR(255) NOT NULL,
    `token`      VARCHAR(255) NOT NULL,
    `created_at` DATETIME,
    PRIMARY KEY (`id`),
    UNIQUE (`token`)
) ENGINE = InnoDB;

-- Пример справочника
CREATE TABLE IF NOT EXISTS `guide_example`
(
    `id`         INT NOT NULL AUTO_INCREMENT,
    `name`       VARCHAR(255),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `deleted_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

INSERT INTO `guide_example`
SET `name`       = 'Пример справочника №1',
    `created_at` = '2018-10-28 00:00:00';

INSERT INTO `guide_example`
SET `name`       = 'Пример справочника №2',
    `created_at` = '2018-10-28 00:00:00';

-- История регистраций
CREATE TABLE IF NOT EXISTS `history_registrations`
(
    `id`                  BIGINT NOT NULL AUTO_INCREMENT,
    `device_uuid`         VARCHAR(255),
    `device_platform`     VARCHAR(255),
    `device_version`      VARCHAR(255),
    `device_manufacturer` VARCHAR(255),
    `device_model`        VARCHAR(255),
    `created_at`          DATETIME,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- Информация о пользователях (добавляйте любые дополнительные поля)
CREATE TABLE IF NOT EXISTS `info_users`
(
    `id`          INT NOT NULL AUTO_INCREMENT,
    `user_id`     INT NOT NULL,
    `roles`       JSON,
    `email`       VARCHAR(255),
    `first_name`  VARCHAR(255),
    `second_name` VARCHAR(255),
    `last_name`   VARCHAR(255),
    `created_at`  DATETIME,
    `updated_at`  DATETIME,
    `deleted_at`  DATETIME,
    PRIMARY KEY (`id`),
    UNIQUE KEY (`user_id`)
) ENGINE = InnoDB;

INSERT INTO `info_users`
SET `id`          = 1,
    `user_id`     = 1,
    `roles`       = '{"admin": true}',
    `email`       = 'lemurro@lemurro',
    `first_name`  = 'для',
    `second_name` = 'cli-скриптов',
    `last_name`   = 'Пользователь',
    `created_at`  = '2019-04-30 00:00:00';

-- Сессии пользователей
CREATE TABLE IF NOT EXISTS `sessions`
(
    `id`            BIGINT       NOT NULL AUTO_INCREMENT,
    `session`       VARCHAR(255) NOT NULL,
    `ip`            VARCHAR(255),
    `user_id`       INT          NOT NULL,
    `device_info`   JSON,
    `geoip`         JSON,
    `admin_entered` TINYINT      NOT NULL DEFAULT '0',
    `created_at`    DATETIME,
    `checked_at`    DATETIME,
    PRIMARY KEY (`id`),
    UNIQUE KEY (`session`)
) ENGINE = InnoDB;

-- Пользователи
CREATE TABLE IF NOT EXISTS `users`
(
    `id`         INT          NOT NULL AUTO_INCREMENT,
    `auth_id`    VARCHAR(255) NOT NULL,
    `locked`     TINYINT      NOT NULL DEFAULT '0',
    `created_at` DATETIME,
    `updated_at` DATETIME,
    `deleted_at` DATETIME,
    PRIMARY KEY (`id`),
    UNIQUE KEY (`auth_id`)
) ENGINE = InnoDB;

INSERT INTO `users`
SET `id`         = 1,
    `auth_id`    = 'lemurro@lemurro',
    `created_at` = '2019-04-30 00:00:00';
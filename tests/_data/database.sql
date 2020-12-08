DELETE FROM
    example
WHERE
    name LIKE 'test record%';

DELETE FROM
    guide_example
WHERE
    name LIKE 'test record%';

INSERT INTO
    users
SET
    auth_id = 'test@local.local',
    created_at = '2020-12-06 00:00:00',
    deleted_at = NULL ON DUPLICATE KEY
UPDATE
    auth_id = 'test@local.local',
    created_at = '2020-12-06 00:00:00',
    deleted_at = NULL;

INSERT INTO
    info_users
SET
    user_id = (
        SELECT
            id
        FROM
            users
        WHERE
            auth_id = 'test@local.local'
    ),
    roles = '{\"admin\": true}',
    email = 'test@local.local',
    first_name = 'Тест',
    second_name = 'Тестович',
    last_name = 'Тестов',
    created_at = '2020-12-06 00:00:00',
    deleted_at = NULL ON DUPLICATE KEY
UPDATE
    user_id = (
        SELECT
            id
        FROM
            users
        WHERE
            auth_id = 'test@local.local'
    ),
    roles = '{\"admin\": true}',
    email = 'test@local.local',
    first_name = 'Тест',
    second_name = 'Тестович',
    last_name = 'Тестов',
    created_at = '2020-12-06 00:00:00',
    deleted_at = NULL;
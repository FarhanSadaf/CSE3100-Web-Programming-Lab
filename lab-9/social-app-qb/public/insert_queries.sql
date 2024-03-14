INSERT INTO users (name, email, password) VALUES
('John Doe', 'john@example.com', 'password123'),
('Alice Smith', 'alice@example.com', 'securepass'),
('Bob Johnson', 'bob@example.com', 'test123');

INSERT INTO profiles (user_id, bio) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(2, 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(3, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');

INSERT INTO posts (user_id, title, content, created_at, updated_at) VALUES
(1, 'First Post From John Doe', 'This is the content of the first post.', NOW(), NOW()),
(1, 'Second Post From John Doe', 'This is the content of the second post.', NOW(), NOW()),
(2, 'First Post From Alice', 'This is the content of the first post.', NOW(), NOW()),
(3, 'First Post From Bob', 'This is the content of the first post.', NOW(), NOW());

INSERT INTO tags (name) VALUES
('Technology'),
('Travel'),
('Food');

INSERT INTO post_tag (post_id, tag_id) VALUES
(1, 1),
(1, 2),
(2, 2),
(3, 3),
(3, 1),
(4, 3);
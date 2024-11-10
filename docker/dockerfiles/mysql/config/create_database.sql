CREATE DATABASE IF NOT EXISTS `moonshine_demo_blog`;
CREATE DATABASE IF NOT EXISTS `moonshine_demo_blog_test`;

CREATE USER IF NOT EXISTS 'moonshine_demo_blog'@'%' IDENTIFIED BY '12345';

GRANT ALL PRIVILEGES ON `moonshine_demo_blog`.* TO 'moonshine_demo_blog'@'%';
GRANT ALL PRIVILEGES ON `moonshine_demo_blog_test`.* TO 'moonshine_demo_blog'@'%';

GRANT SELECT  ON `information\_schema`.* TO 'moonshine_demo_blog'@'%';
FLUSH PRIVILEGES;
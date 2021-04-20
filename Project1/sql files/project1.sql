
use foodchoices;
create table customerinfo(
`firstname` VARCHAR(10),
`lastname` VARCHAR(15),
`username` VARCHAR(20) UNIQUE,
`email` VARCHAR(40) UNIQUE,
`password` VARCHAR(15)
);
describe customerinfo;
select * from customerinfo;
ALTER TABLE customerinfo 
DROP COLUMN `password`;
describe customerinfo;
describe customerinfo;
SELECT * FROM customerinfo;
create table books(
  book_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  isbn bigint(20) NOT NULL,
  title varchar(5000) NOT NULL,
  edition varchar(100),
  lang varchar(100) NOT NULL,
  publisher varchar(500) NOT NULL,
  b_authors varchar(100) NOT NULL
);

create table bookstore_books(
  book_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title varchar(5000) NOT NULL,
  category_name varchar(100),
  author varchar(100),
  price decimal(11,2),
  flag varchar(100) NOT NULL,
  book_img varchar(500) NOT NULL,
  year int(4) NOT NULL
);


insert into books(isbn, title, edition, lang, publisher, b_authors)
values(9780393310351, 'Thinking Strategically: The Competitive Edge in Business, Politics, and Everyday Life', 'N/A', 'English', 'W. W. Norton & Company', 'Avinash K. Dixit, Barry J. Nalebuff');

insert into books(isbn, title, edition, lang, publisher, b_authors)
values(9780066620992, "Good to Great: Why Some Companies Make the Leap and Others Don't", '1st edition', 'English', 'HarperBusiness', 'Jim Collins');

insert into books(isbn, title, edition, lang, publisher, b_authors)
values(9781492041948, 'Generative Deep Learning: Teaching Machines to Paint, Write, Compose, and Play', '1st edition', 'English', "O'Reilly Media", 'David Foster');



create table individual_seller(
  seller_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  book_id int(11) NOT NULL,
  price double(10,2) NOT NULL,
  quantity int(11) NOT NULL,
  contact varchar(50) NOT NULL
); 

create table users(
    user_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_name varchar(50) NOT NULL, 
    password varchar(255) NOT NULL, 
    name varchar(50) NOT NULL
);

create table admin(
    admin_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstName varchar(50) NOT NULL, 
    lastName varchar(255) NOT NULL, 
    email varchar(50) NOT NULL,
    hash varchar(255) NOT NULL
);

create table categories(
    category_id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    category_name varchar(50) NOT NULL,
    date_added datetime
);

insert into individual_seller(book_id, price, quantity, contact)
values(1, 200.50, 10, 017547667);
insert into individual_seller(book_id, price, quantity, contact)
values(2, 201.60, 15, 019547667);
insert into individual_seller(book_id, price, quantity, contact)
values(3, 202.70, 15, 018547667);


create table new_book_shop(
 book_id int(11) NOT NULL, 
 price double(10,2) NOT NULL,
 quantity int(11) NOT NULL
);



insert into new_book_shop(book_id, price, quantity)
values(1, 300.50, 5);
insert into new_book_shop(book_id, price, quantity)
values(2, 301.60, 7);
insert into new_book_shop(book_id, price, quantity)
values(3, 302.70, 9);



create table old_book_shop(
  book_id int(11) NOT NULL,
  price double(10,2) NOT NULL,
  quantity int(11) NOT NULL
);



insert into old_book_shop(book_id, price, quantity)
values(1, 400.50, 20);
insert into new_book_shop(book_id, price, quantity)
values(2, 401.60, 25);
insert into new_book_shop(book_id, price, quantity)
values(3, 402.70, 30);

INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9780393310351, 
    'Thinking Strategically: The Competitive Edge in Business, Politics, and Everyday Life',
    '1st edition',
    'English',
    'W. W. Norton & Company'
);
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9780066620992,
    "God to Great:Why Some Companies Make the Leap and Others Don't",
    '1st edition',
    'English',
    'HarperBusiness'
);
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
     9781492041948,
    "Generative Deep Learning: Teaching Machines to Paint, Write, Compose, and Play",
    '1st edition',
    'English',
    "O'Reilly Media"
);

INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9780387310732,
    'Pattern Recognition and Machine Learning',
    NULL,
    'English',
    'Springer'
);
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
     9783030248918,
    'The Internet of Things in the Industrial Sector: Security and Device Connectivity, Smart Environments, and          Industry 4.0',
    '1st edition',
    'English',
    'Springer'
);    

INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
     9781449355739,
    'Learning Python',
    'Fifth edition',
    'English',
    "'O'Reilly Media'"
);    
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9780552161275,
    'The Da Vinci Code',
    'Latest ed.',
    'English',
    'RHUK'
);    
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9781416524793,
    'Angels and Demons',
    'Latest ed.',
    'English',
    'RHUK'
);
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9780552169592,
    'Inferno',
    'Latest ed.',
    'English',
    'Corgi'
);
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9780062073488,
    'And Then There Were None',
    'Reissue ed.',
    'English',
    'William Morrow'
);
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9780062073563,
    'The Murder of Roger Ackroyd: A Hercule Poirot Mystery',
    'Reprint ed.',
    'English',
    'William Morrow'
);
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9781439148129,
    'Postmortem',
    'Reprint ed.',
    'English',
    'Pocket Books'
);
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9780062436702,
    'Chaos',
    NULL,
    'English',
    'William Morrow'
);
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9780425270042,
    'Dust',
    'Reprint ed.',
    'English',
    'Berkley'
);
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9780060853983,
    'Good Omens: The Nice and Accurate Prophecies of Agnes Nutter, Witch',
    'Reprint ed.',
    'English',
    'William Morrow'
);
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9789332549449,
    'The C Programming Language',
    '2nd edition',
    'English',
    'Pearson Education India'
);
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9780131099500,
    'C Programming Language',
    NULL,
    'English',
    'Prentice Hall'
);
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9781405826013,
    'Structured Computer Organization with C Programming Language',
    '5th ed.',
    'English',
    'Prentice Hall'
);
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9781405811194,
    'UNIX for Programmers and Users with C Programming Language',
    NULL,
    'English',
    'Prentice Hall'
);
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9781984291516,
    'Banalata Sen',
    NULL,
    'Bengali',
    'CreateSpace Independent Publishing Platform'
);
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9781979456968,
    'Shesher Kabita',
    NULL,
    'Bengali',
    'CreateSpace Independent Publishing Platform'
);
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9781984107473,
    'Padma Nadir Majhi',
    NULL,
    'Bengali',
    'CreateSpace Independent Publishing Platform'
);
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9781986020909,
    'Rupasi Bangla',
    NULL,
    'Bengali',
    'CreateSpace Independent Publishing Platform'
);
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9780674417045,
    'The Essential Tagore',
    NULL,
    'English',
    'Belknap Press: An Imprint of Harvard University Press'
);
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9781521925775,
    'Gitanjali',
    NULL,
    'English',
    'Independently published'
);
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9781847941831,
    'Atomic Habits',
    NULL,
    'English',
    'Random House Business'
);
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9781451639612,
    'The 7 Habits of Highly Effective People: Powerful Lessons in Personal Change',
    'Anniversary edition',
    'English',
    'Simon & Schuster'
);
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9780062954862,
    'The Case Against Socialism',
    NULL,
    'English',
    'Broadside Books'
);
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9781409186052,
    'The Night Fire',
    NULL,
    'English',
    'Orion'
);
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9781984827616,
    'Where the Crawdads Sing',
    'Large Print edition',
    'English',
    'Random House Large Print'
);
    
INSERT INTO books(isbn, title, edition, lang, publisher)
VALUES
(
    9781452182759,
    'Dumpty: The Age of Trump in Verse',
    NULL,
    'English',
    'Chronicle Prism'
);
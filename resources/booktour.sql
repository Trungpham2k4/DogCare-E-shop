create database booktour;

create table customers(
	customer_id int auto_increment primary key,
    name varchar(255) not null,
    email varchar(255) unique not null,
    phone varchar(20) unique not null,
    password varchar(255) not null,
    gender enum('female', 'male') not null,
    address text
);

CREATE TABLE members (
    membership_id INT auto_increment PRIMARY KEY,
    membership_level VARCHAR(50),
    loyalty_points INT,
    customer_id INT not null,
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
);

CREATE TABLE employees (
    employee_id INT auto_increment PRIMARY KEY,
    name VARCHAR(255),
    position VARCHAR(100),
    phone_number VARCHAR(20),
    department VARCHAR(100)
);

CREATE TABLE tour_guides (
    guide_id INT auto_increment PRIMARY KEY,
	name VARCHAR(255) not null,
    language VARCHAR(255),
    experience INT default 0,
    phone_number VARCHAR(20),
    employee_id int not null,
    
    foreign key (employee_id) references employees(employee_id)
);

CREATE TABLE tour_types (
    tour_type_id INT auto_increment PRIMARY KEY,
    name VARCHAR(255),
    description TEXT
);

create table tours(
	tour_id int auto_increment primary key,
    name varchar(255) not null,
    detailed_itinerary TEXT,  -- Lịch trình chi tiết
    duration int not null,
    price decimal(10,2) not null,
    description text not null,
    tour_type_id int not null,
    
    foreign key (tour_type_id) references tour_types(tour_type_id)
);

-- create table tour_schedules(
-- 	schedule_id int auto_increment primary key,
--     tour_id int not null,
--     departure_date date not null,
--     return_date date not null,
--     price decimal(10,2) not null,
--     available_seats int not null,
--     foreign key (tour_id) references tours(tour_id)
-- );

create table location(
	location_id integer auto_increment primary key,
    location_name varchar(255) not null,
    description text not null,
    image_url text not null,
    food text not null,
    history text not null,
    festival text not null,
	tour_id int not null,
    
    foreign key (tour_id) references tours(tour_id)
);

CREATE TABLE transport (
    transport_id INT auto_increment PRIMARY KEY,
    transport_type VARCHAR(100) unique not null,
    capacity INT not null
);

create table bookings(
	booking_id int auto_increment primary key,
    customer_id int not null,
    tour_id int not null,
    num_guests int not null,
    total_price decimal(10,2) not null,
    payment_status enum('Pending', 'Paid', 'Cancel') default 'Pending', 
    booking_date timestamp default current_timestamp,
    staff_id int not null,
    
    foreign key (staff_id) references employees(employee_id),
    foreign key (customer_id) references customers(customer_id),
    foreign key (tour_id) references tours(tour_id)
);

CREATE TABLE invoices (
    invoice_id INT auto_increment PRIMARY KEY,
    booking_id INT not null,
    payment_date Date not null,
    total_amount DECIMAL(10,2) not null,
    employee_id INT not null,
    
    FOREIGN KEY (booking_id) REFERENCES bookings(booking_id),
    FOREIGN KEY (employee_id) REFERENCES employees(employee_id)
);


create table reviews(
	review_id int primary key auto_increment,
    customer_id int not null,
    tour_id int not null,
	rating int  not null check(rating between 1 and 5),
    comment text not null,
    satisfaction_level VARCHAR(50),
    review_date timestamp default current_timestamp,
    
    foreign key (customer_id) references customers(customer_id),
    foreign key (tour_id) references tours(tour_id)
)

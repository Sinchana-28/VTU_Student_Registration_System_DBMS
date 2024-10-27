VTU Student Registration Management System

Overview:

The VTU Student Management System is a web-based application designed to manage student registrations, academic records, college enrollments, accommodation details, and billing information for VTU (Visvesvaraya Technological University) students. The system utilizes a MySQL database and PHP for backend processing, with a frontend implemented in HTML.

Features:

Student Registration: Collects comprehensive student information including personal details, educational background, and contact information.

Marks Entry: Records marks for both 10th and 12th grades, capturing total and maximum marks.

College Enrollment: Manages details related to student enrollments in colleges, including college name, course, and fee structure.

Accommodation Details: Records information about student accommodation, including type and address.

Billing Management: Tracks payments made by students, including status and amount.

Database Schema:

The database consists of the following tables:

Students: Stores student details such as name, parents' names, date of birth, contact information, and educational background.

TwelveMarks: Records marks for three subjects from the 12th grade, along with total and maximum marks.

TenMarks: Stores total and maximum marks for the 10th grade.

CollegeEnrollment: Contains information about college enrollments including college name, course details, and fees.

StudentAccommodation: Manages accommodation details including type, address, and guardian contact information.

CollegeBill: Tracks billing information, including payment status, amount paid, and pending amount.

Technologies Used:

Frontend: HTML

Backend: PHP

Database: MySQL

Prerequisites:

Web server with PHP support (e.g., Apache)

MySQL database

PHP installed and configured

Database management tool (e.g., phpMyAdmin) for managing the database

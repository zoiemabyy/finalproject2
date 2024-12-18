CREATE DATABASE WritingCenterFinal;

USE WritingCenterFinal;

-- Table for users (students and admins)
CREATE TABLE UsersFinal (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('student', 'admin') DEFAULT 'student' NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for tutors
CREATE TABLE TutorsFinal (
    tutor_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    profile_image VARCHAR(255),
    status ENUM('pending', 'approved', 'declined') DEFAULT 'pending' NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for tutor availability
CREATE TABLE AvailabilityFinal (
    availability_id INT AUTO_INCREMENT PRIMARY KEY,
    tutor_id INT NOT NULL,
    available_date DATE NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (tutor_id) REFERENCES TutorsFinal(tutor_id) ON DELETE CASCADE
);

-- Table for appointments
CREATE TABLE AppointmentsFinal (
    appointment_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    tutor_id INT NOT NULL,
    appointment_date DATE NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    status ENUM('pending', 'attended', 'cancelled') DEFAULT 'pending' NOT NULL,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES UsersFinal(user_id) ON DELETE CASCADE,
    FOREIGN KEY (tutor_id) REFERENCES TutorsFinal(tutor_id) ON DELETE CASCADE
);

-- Table for tracking statistics
CREATE TABLE StatisticsFinal (
    stat_id INT AUTO_INCREMENT PRIMARY KEY,
    total_students INT DEFAULT 0,
    total_tutors INT DEFAULT 0,
    total_appointments INT DEFAULT 0,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

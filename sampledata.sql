-- Insert sample data into the Roles table
use ewd_database;
INSERT INTO Roles (role_name) VALUES ('Manager'), ('Employee');

-- Insert sample data into the Categories table
INSERT INTO Categories (category_name) VALUES ('Technology'), ('Human Resources'), ('Marketing');

-- Insert sample data into the Department table
INSERT INTO Department (department_name) VALUES ('IT'), ('HR'), ('Marketing');

-- Insert sample data into the Staff table
INSERT INTO Staff (username, first_name, last_name, email_address, phone_number, password, account_status, position, role_id, department_id) 
VALUES 
('JD','John', 'Doe', 'john.doe@example.com', '1234567890', 'password123', 'active','allowed' 'Manager', 1, 1),
('JS','Jane', 'Smith', 'jane.smith@example.com', '9876543210', 'password456', 'active','allowed' 'Employee', 2, 2),
('MJ','Michael', 'Johnson', 'michael.johnson@example.com', '1231231234', 'password789', 'active','allowed' 'Employee', 2, 3);

-- Insert sample data into the Idea table
INSERT INTO Idea (title, description, date, anonymous, staff_id, supporting_document) 
VALUES 
('New Website Design', 'Proposing a redesign of the company website.', '2024-04-15 08:30:00', FALSE, 1, 'website_design.pdf'),
('Employee Training Program', 'Suggesting a new training program for employees.', '2024-04-15 15:30:00', TRUE, 2, 'training_program.pdf'),
('Social Media Campaign', 'Proposing a new social media campaign for marketing.', '2024-04-15 10:30:00', FALSE, 3, 'social_media_campaign.pdf');

-- Insert sample data into the Idea_Categories table
INSERT INTO Idea_Categories (idea_id, category_id) VALUES (1, 1), (2, 2), (3, 3);

-- Insert sample data into the Comments table
INSERT INTO Comments (author_id, idea_id, date, anonymous, text) 
VALUES 
(2, 1, '2024-04-02', FALSE, 'Great idea! I think it will improve user engagement.'),
(3, 1, '2024-04-03', TRUE, 'I agree with the proposal.'),
(1, 2, '2024-04-03', FALSE, 'This training program will be beneficial for new employees.'),
(3, 3, '2024-04-04', FALSE, 'I have some suggestions for the social media campaign.');

-- Insert sample data into the Likes table
INSERT INTO Likes (idea_id, author_id) VALUES (1, 2), (2, 1), (3, 3);

-- Insert sample data into the Views table
INSERT INTO Views (idea_id, staff_id) VALUES (1, 2), (2, 1), (3, 3);

-- Insert sample data into the report_idea table
INSERT INTO report_idea (idea_id, staff_id) VALUES (1, 2), (2, 1), (3, 3);

-- Insert sample data into the report_comment table
INSERT INTO report_comment (idea_id, staff_id) VALUES (1, 2), (2, 1), (3, 3);

-- Insert sample data into the deadline table
INSERT INTO deadline (idea_id, deadline_date) VALUES (1, '2024-05-01'), (2, '2024-06-01'), (3, '2024-07-01');

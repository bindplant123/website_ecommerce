-- OTP Reset Password Update Script

-- Change database name here
USE db_plantnest;

-- Add OTP column
ALTER TABLE users ADD COLUMN otp VARCHAR(6);

-- Add OTP Expiry column
ALTER TABLE users ADD COLUMN otp_expire DATETIME;

-- Optional: Reset Token column (advanced)
ALTER TABLE users ADD COLUMN reset_token VARCHAR(255);

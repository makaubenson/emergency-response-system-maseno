# Setting Up Development Environment

## Download and Install Mamp

- link `https://www.mamp.info/en/downloads/`

## Download and Install Git Version Control

- link `https://git-scm.com/download/win`

## Navigate to `htdocs folder` inside MAMP'S installed files

## Clone this project repository

- Open command prompt / terminal
- Run this command `git clone https://github.com/makaubenson/maseno-E-help.git`

## Open / Run Mamp

- Start Apache and MySQL

![mamp](https://user-images.githubusercontent.com/59168713/161569802-0cb6d710-33ef-427b-934b-1ec3400d1c98.png)

- Click `open WebStart Page`
- The page below opens

![mamp2](https://user-images.githubusercontent.com/59168713/161570340-1b18648d-2d0c-46e8-84f2-7af994a98699.png)

- Click `phpMyadmin`

![db](https://user-images.githubusercontent.com/59168713/161571173-9e570fe2-5e09-4602-98c5-9288ee04204b.png)

- Write `maseno-E-help` as the database name.
- ![image](https://user-images.githubusercontent.com/59168713/169878683-355d2abe-9e73-4389-b2bc-a456a889fc80.png)
- Import the `.sql` file in the `database folder` found on the `project directory`.
- Find `server.php` file in `rescue`,`admin` and `project directory` and change the database connection credentials.
- Save the project, and run it.

## Admin Test Credentials

- To open the admin login, visit `http://localhost/maseno-E-health/admin/`
- Use `username`: MSU/00046/022 and `Password`: benson

## Rescue Team Test Credentials

- To open the rescue login, visit `http://localhost/maseno-E-health/rescue/`
- Use `username`: CUTY/022 and `Password`: benson
- OR
- Use `username`: HYDRO/022 and `Password`: benson
- OR
- Use `username`: SHIFTY/022 and `Password`: benson

## Student Test Credentials

- For students, visit `http://localhost/maseno-E-health/register.php`
- ![image](https://user-images.githubusercontent.com/59168713/169881214-40c993df-eb9f-48b8-8a1d-06859e77dee9.png)
- Register your students from here. `NOTE`: The username filled above is what will be required to log in.
- `Congratulations, you have fully setup this project.`

# Note: This project was taken to production and hosted.
- The student url is `(https://emergency-maseno.blinx.co.ke/)`
- The admin url is `https://emergency-maseno.blinx.co.ke/admin/`
- The rescue team url is `https://rescueteam-maseno.blinx.co.ke/`
- This projects should be used under the `GNU General Public License ` guidelines.
- Thank You for taking your time to explore this project.

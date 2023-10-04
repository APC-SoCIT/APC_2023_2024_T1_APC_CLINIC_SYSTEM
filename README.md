# E-Cliniq

## Branches
- There are 2 branches that been used on this repository the `main` and `framework`
- Used the `main` branch for uploading documents and related needs for this project
- Used the `framework` branch if you like to clone the system on your local computer or push any modification
> Note :
> Please inform the team's developer whenever you would like to push your modified code and such
## Installing System instruction
1. Copy the link under the **<>Code**
2. In your Visual Studio Code press `ctrl + p` and type `>Git:Clone` then entered
3. After entered, paste the link that you copy from **<>Code** then entered
4. After cloning, open the clone folder by selecting the `File > Open Folder` and select the clone folder
5. Change the copy the `.env.example`, paste it, and rename into `.env`
6. Then from `.env`, connect your database by filling the following details:
   - `DB_DATABASE` *(your database name)* sample = `e_cliniq`
   - `DB_USERNAME` *(your database username)* sample = `root`
   - `DB_PASSWORD` *(your database password)* sample = `password`
7. After that, in your terminal type `composer update` then wait to finish
8. After that, type `npm install` to install node.js then wait to finish
9. After that, type `php artisan key:generate`
10. Next, type `php artisan migrate` after the migrate, type `php artisan db:seed` to generate data on migrate table
11. Finally run the node.js by typing in your terminal `npm run dev`
12. Open new terminal or mirror the existing one on your Visual Studio Code and type `php artisan serve` 

# Spring College Course Management System

## Step 1: Cloning the repository

It is either you download the repo or clone it using your terminal. To clone the repo,
Navigate to the folder were you will be lunching your project, then run the command below 

```
git clone https://github.com/harmlessprince/-seniorinternet.git
```

After cloning successfully, you should see the file downloaded successfully downloaded to the directory you specified. 

## Step 2: Editing your enviroment variables
Laravel comes with a file called **.env.example**, with all typical configuration values.

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=springcollege
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

```
But for you to able to run project on you local machine. We need to do three things

 1.  Create a file .env in the root of your project.

 2. Copy that example file contents into the created .env file with this command on linux or just use your normal copying of content technique suitable for your opersting system.
 ```
 cp .env.example .env
 ```
3. Edit the new .env file, in your text editor. You can change a lot of variables  but the main ones you need to change or add to your .env file are these.

```
APP_NAME="Spring College"
APP_ENV=local
APP_KEY=
APP_DEBUG=false
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=yourdatabasename
DB_USERNAME=databaseusername
DB_PASSWORD=databasepassword
```

## Step 3: Running composer install
Let run this "magic" command 
```
composer install
```
On this step, you may accounter some errors if some pacjages are not compatible wth you php version or extensions. So check or any messages and fix before proceding to the next step.

Incase of success, it looks like something like this

```
Installing dependencies from lock file (including require-dev)
Verifying lock file contents can be installed on current platform.
Nothing to install, update or remove
Generating optimized autoload files
> Illuminate\Foundation\ComposerScripts::postAutoloadDump
> @php artisan package:discover --ansi
Discovered Package: facade/ignition
Discovered Package: fideloper/proxy
Discovered Package: fruitcake/laravel-cors
Discovered Package: laravel/passport
Discovered Package: laravel/sail
Discovered Package: laravel/tinker
Discovered Package: nesbot/carbon
Discovered Package: nunomaduro/collision
Package manifest generated successfully.
79 packages you are using are looking for funding.
Use the `composer fund` command to find out more!

```

## Step 4: Generate application key.
We need to run this command: 
```
php artisan key:generate
```
It generates a random key which is automatically added to .env file **APP_KEY** variable.

## Step 5: Migrating DB Schema.
In order to migrate we need to lunch this

```
php artisan migrate
```
You should have a similar or the same output as this.

```
Migration table created successfully.
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table (39.01ms)
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table (32.73ms)
Migrating: 2019_08_19_000000_create_failed_jobs_table
Migrated:  2019_08_19_000000_create_failed_jobs_table (41.65ms)
Migrating: 2019_12_14_000001_create_personal_access_tokens_table
Migrated:  2019_12_14_000001_create_personal_access_tokens_table (56.37ms)
Migrating: 2022_01_07_205112_create_semesters_table
Migrated:  2022_01_07_205112_create_semesters_table (17.59ms)
Migrating: 2022_01_07_205113_create_lecturers_table
Migrated:  2022_01_07_205113_create_lecturers_table (44.72ms)
Migrating: 2022_01_07_205155_create_courses_table
Migrated:  2022_01_07_205155_create_courses_table (157.00ms)
Migrating: 2022_01_07_205524_create_students_table
Migrated:  2022_01_07_205524_create_students_table (44.65ms)
Migrating: 2022_01_07_215400_create_course_student_table
Migrated:  2022_01_07_215400_create_course_student_table (151.53ms)

```

then let seed the database.
```
php artisan db:seed
```
Your output should be something like this.
```
Seeding: Database\Seeders\SemesterSeeder
Seeded:  Database\Seeders\SemesterSeeder (20.51ms)
Seeding: Database\Seeders\StudentSeeder
Seeded:  Database\Seeders\StudentSeeder (453.92ms)
Seeding: Database\Seeders\LecturerSeeder
Seeded:  Database\Seeders\LecturerSeeder (51.90ms)
Seeding: Database\Seeders\CourseSeeder
Seeded:  Database\Seeders\CourseSeeder (474.32ms)
Seeding: Database\Seeders\StudentCourseSeeder
Seeded:  Database\Seeders\StudentCourseSeeder (7,300.73ms)
Database seeding completed successfully.

```
To speed up the process, you may run two commands above as one

```
php artisan migrate --seed
```
There are about 15 test cases.  You can run test by running the command below.

```
php artisan test
```
If your installation and migration goes well, you should see the following ouptut.

```
   PASS  Tests\Unit\CourseControllerTest
  ✓ index route can be reached
  ✓ show route can be reached

   PASS  Tests\Unit\CourseTest
  ✓ a course belongs to a semester
  ✓ a course belongs to a lecturer
  ✓ a course belongs to one or more students

   PASS  Tests\Unit\LecturerControllerTest
  ✓ index route can be reached
  ✓ show route can be reached

   PASS  Tests\Unit\LecturerTest
  ✓ lecturers table has expected columns
  ✓ a lecturer has many courses

   PASS  Tests\Unit\SemesterTest
  ✓ semesters table has expected columns
  ✓ a semester has many courses

   PASS  Tests\Unit\StudentControllerTest
  ✓ index route can be reached
  ✓ show route can be reached

   PASS  Tests\Unit\StudentTest
  ✓ students table has expected columns
  ✓ students registered for one or more courses

  Tests:  15 passed
  Time:   0.56s

```

## Vistit App Demo at:

[Spring College Domo](https://seniorspringcollege.herokuapp.com/ "Spring College Domo")


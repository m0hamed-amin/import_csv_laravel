# Import Large Excel sheet to DB



The Idea here is that the file is too large so you need to make some tricks beginning from edit some configuration in php.ini.


So, edit your php.ini that serve your application 

change maximum post size
change maximum upload file
change memory limit

restart your PHP engine - on MAC OS

```bash
brew services restart php@7.2
```



## what i Have Done


First I raised an event that user had uploaded a file from controller.
 
thorugh Listener will I called the laravel excel library to handle file. 

This package provide importing to run on a queue though modyfing it to be  implement ``` ShouldQueue``` so no need to create again.

the main file here is inside ```imports/importeUser``` that do the process passed by validation - queuable - skipp errors..etc.


## Installation

first make a clone to project

``` git clone https://github.com/mohamedamin90/import_csv_laravel.git ```


## Usage on terminal 

```
cd ~/Sites/import_csv_laravel  # to your path of clonning 

composer install 

php artisan serve 

```

## on Browser
Open you browser ``` http://127.0.0.1:8000/import ```

## monitor you jobs

you need to run 

``` php artisan queue:work > storage.logs.jobs.log```  to log the jobs status, 
usually in production I use supervisor to monitor and configure this to run by supervisor.

after return I sent generic email without sending with sending success or failure numbers - without any testing coverage according to available time

## what i will do next 

I'll apply clean code and solid and enhance the rushing work in this task, I left the dependencies all over the project - I will get rid of it also.
I will finish the whole task and publish it


## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).



## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

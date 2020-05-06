

## About import Large Excel sheet to be imported into DB

The Idea here is that the file is too large so you need to make some tricks. 

edit your php.ini that serve your application 

change maximum post size
change maxmum upload file
change memory limit

restart your brew services restart php@7.2

I made this by applying Queues that come with laravel.

First raise an event that user had uploaded a file. 
thorugh Listeners will call the larave excel library to handle file. 

this package allow importing to run on a queue thourh modyfing it to be ShouldQueue.

the main file here is inside imports/importedUser that do the process passed by validation - queuable - skipp errors..etc.

after return I sent generic email without sending with sending success or failure numbers - without any testing coverage according to available time


## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).



## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

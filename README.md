# Laravel Audit Forge
<p align="center">
    <img src="https://img.shields.io/badge/Framework-Laravel-blue?style=flat-square&logo=laravel" alt="Laravel Framework">
    <img src="https://img.shields.io/badge/Version-v0.0.1-green?style=flat-square" alt="Version">
</p>
Laravel Audit Forge is a tool developed to integrate auditing features with Laravel, providing greater control over user actions. The key differentiator of Laravel Audit Forge is its support for queue usage, allowing for more efficient handling of auditing tasks.

## This version includes:
 - Database change auditing: It is possible to choose which models in your structure will be monitored when actions such as insertion, update, and deletion are performed.

- Route auditing: Route auditing allows you to map the entire flow that your client followed within the application.

## Requirements
- PHP 8.0 or higher.
- Laravel 9 or higher.
- Composer

## Instalation
In the project terminal, run the command below:
````bash
 composer require eudu4rdo/laravelauditforge
````
With the package installed, publish the migrations and configuration files:
````bash
 php artisan vendor:publish --provider="eudu4rdo\laravelauditforge\AuditForgeServiceProvider"
````
Run the migrations.
## Basic Usage
To perform basic usage of the application, simply use the Auditable trait in the model you wish to monitor:
````bash
use App\Traits\Auditable;

class ExampleModel extends Model
{
    use Auditable;

    // Other model configurations
}
````

## Configuration
The package provides flexible configurations to suit your auditing needs:

- Audit Events: Define the database connection, table, and primary key for logging events.
- Audit Routes: Enable route auditing, ignore specific routes or HTTP methods.
- User Settings: Link audit logs to users with customizable table and key settings.
- Job Processing: Optionally offload audit logging to Laravel's queue system.
Customize these settings in the config/audit.php file after publishing the configuration.

## Upcoming Features:
- Authentication audit.

## License
This project is open-sourced software licensed under the [MIT License](LICENSE).

## Contact
For questions or suggestions, reach out on GitHub or contact the repository owner directly. My links:
<p align="center">
    <a  href="mailto:eg47202@gmail.com"  target="_blank"><img  src="https://img.shields.io/badge/Gmail-D14836?style=for-the-badge&logo=gmail&logoColor=white"  target="_blank"></a>
    <a  href="https://www.linkedin.com/in/eudu4rdo/"  target="_blank"><img  src="https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white"  target="_blank"></a>
</p>
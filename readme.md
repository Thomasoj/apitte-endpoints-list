# Apitte Endpoint List Command

Just simple command for [kdyby/console](https://github.com/Kdyby/Console/) and [Apitte - Great PHP/PSR7 API for Nette Framework](https://github.com/apitte), that shows available endpoints in console.

## Usage
1. Install with Composer 
	```
	$ composer require thomasoj/apitte-endpoints-list
	``` 

2. [Register command](https://github.com/Kdyby/Console/blob/master/docs/en/index.md#registering-commands) in config.neon
	```
	services:
		ApitteEndpointsListCommand:
			class: 	- Thomasoj\ApitteEndpointsList\Command\ApitteEndpointsListCommand
			tags: [kdyby.console.command]
	```
3. Run command
	```
	$ bin/console api:endpoints
	```

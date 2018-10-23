# ROOMBOOKER

![](https://circleci.com/gh/Log-baseE/roombooker.svg?style=shield&circle-token=8a5dfe38b39dccc1ca640c27c3ea01d92e0abd7a)

A room booking web app built using the [Laravel](https://laravel.com/) framework

## Running

Most of the configuration for the [Homestead](https://laravel.com/docs/5.7/homestead) virtual machine is done in `Homestead.yaml`. For _Homestead_ to work properly, create a new file named `Homestead.yaml` in the project root, with contents copied from `Homestead.example.yaml`. Once the file is successfully made, change the directory mapping according to your project path.

```yml
map: 'C:\path\to\roombooker'
to: /home/vagrant/code
```

**[Don't forget to add the app domain into `/etc/hosts`](https://laravel.com/docs/5.7/homestead#configuring-homestead)**

If everything is done, run **`vagrant up`** to start the virtual machine. You should be able to access the app from your browser using the domain name specified in **`Homestead.yaml`**.

## Development

Before developing, make sure that [PHP](http://php.net/), [Composer](https://getcomposer.org/), and [Laravel](https://laravel.com) are installed properly.

### _Dependencies_

Dependencies are managed with [Composer](https://getcomposer.org/). To fetch all of them, run:

```sh
composer install
```

### _Additional files_

#### `.env`

Create a `.env` file in your project root. Once it's done, copy all of the contents from `.env.example` into the you just created. As you can see, one variable is empty, which is the `APP_KEY` variable. To generate an app key, simply run

```sh
php artisan key:generate
```

You can customize the `.env` variables according to your needs.

## Contributors

* [Nicky Logan](https://github.com/Log-baseE)
* [Madeleine](https://github.com/haysacks)

See the list of contributors for this project [here](https://github.com/Log-baseE/roombooker/graphs/contributors)

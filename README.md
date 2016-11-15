# ConfluencePHPClient
A Confluence RESTful API client in PHP

An Object Oriented wrapper for Confluence, written PHP5

## Requirements

* PHP >= 5.5.0

## Installation

```bash
$ php composer.phar require adlogix/confluence-rest-php-client
```

## Minimal Usage

See the index.php at the root of this repository


## Real life testing

The Atlassian Product you want to authenticate to needs to contact your application using some form of webhooks, so we created the most basic application we could do to show you how it can be accomplished.

Use docker-compose:

```bash
$ docker-compose up -d
```


### Use host names instead of ports

If you've launched the environment you already have a proxy running to redirect ngrok.dev and confluence-client.dev to the correct containers.
You just have to put both domains to your host file or use a solution like [dnsmasq on OSX](https://passingcuriosity.com/2013/dnsmasq-dev-osx/), but be sure to redirect to your docker-machine IP.

To find your docker machine ip use:

```bash
$ docker-machine ip [machine-name]
```


### Get your development instance

Atlassian changed the way to work on Confluence/Jira, now in order to create your plugin, you have to get a [Developer Account](http://go.atlassian.com/cloud-dev) and create your own instance. All the steps to create your environment are defined on the [documentation page](https://developer.atlassian.com/static/connect/docs/latest/guides/development-setup.html).

Once you have access to your own Atlassian Cloud instance and you put it in developer mode, we can continue and let the instance contact us.

### Exposing our local app to the world

The Atlassian app we trying to authenticate must post some information to us, so we need to expose our app on the internet. That's the reason we have a [ngrok](https://ngrok.com/) container running. ngrok is an application which will create a tunnel between our environment and their servers, letting us to be accessed from everywhere.

You should now have a ngrok container running at [ngrok.dev](http://ngrok.dev). When you connect you should see the tunnel url and, if you open it, all the tunnel trafic.

The url to use to install our demo application is https://[your-tunnel-id].eu.ngrok.io/descriptor.json

__Note:__ Everytime you restart the ngrok container, the tunnel id will change, so you should reinstall your plugin each time. I know, it's bad.

### Update the ```view/index.html.twig```file

Be sure to update the view/index.html.twig to set the links to real content urls in order to be able to do the requests. Be sure to replace the base url to point to our api

https://adlogixdevelopers.atlassian.net/'wiki/download/attachments/197331/Adsdaq-login.png?api=v2'
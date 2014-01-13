# Arrhythmia
> Source files for the website of Arrhythmia the game

[![Built with Grunt](https://cdn.gruntjs.com/builtwith.png)](http://gruntjs.com/)

## Getting Started
We use Grunt, Bower, and Node for in our workflow processes. If you have never used these tools before, check out their websites: [Grunt](http://gruntjs.com) and [Bower](http://bower.io). Basically, we use Grunt to run common tasks such as copying files, preprocessing CSS and minifying assets. It automates all the quick, yet often tedious tasks that developers once had to do. Bower is a package manager. It tracks the JS and CSS packages we are using on the site and always makes sure we have the most recent version of those packages. These tools are configured by a number of files in the repository of the site, but you will have to install their CLI on your computer since they do not come installed. Make sure to visit their websites for a guide on how to install them.

Once you're familiar with their process move on. If you aren't familiar with their processes and don't care, well then that's fine. It is time to move on regardless. So Grunt by itself does not do anything; we need to install plugins for each of the different tasks we configure. Install all Grunt plugins needed for this repository with this command:

```shell
$ npm install
```

These plugins will be saved within the `node_modules` directory. Once the plugins are installed, it will be time to install the packages we use:

```shell
$ bower install
```

These packages will be stored within the `src/packages` directory. Once you have everything installed, it is time to actually get Grunt running. We have configured grunt with three basic tasks you can have it run. The first task:

```shell
$ grunt 
```

This task is the default task. It will run every single task configured in the grunfile. Normally this is not what you want to do, but if you ever need a file quickly, this is what you need to do. The second task is:

```shell
$ grunt dev
```

This command will start a task that watches for changes in the `src/` (working) directory. When it sees a change, it will update the corresponding file in the `app/` (production) directory. Lastly, if you simply want to export all the production files at once you can run: 

```shell
$ grunt build
```

## Details
Built with care in New Orleans | Version: **1.0.0**

Copyright (c) 2014 Liam Craver & [Patrick Burtchaell](http://pburtchaell.com/legal)
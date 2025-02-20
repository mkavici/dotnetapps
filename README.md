# dotNet Applications for Vesta

A Vesta plugin to simplify installing and managing ASP.NET Core applications within a Vesta

## Features
- Automatic installation of .NET Core runtime.
- Configures Nginx reverse proxy to expose ASP.NET Core applications.
- Centralized management of port numbers used by ASP.NET Core applications to prevent collisions.
- Centralized monitoring of registered applications to restart them in case of crash.

## Installation
1. Install [VestaCP Plugin Manager](https://github.com/jhmaverick/vestacp-plugin-manager) if not already installed.
2. In the Vesta panel access "Plugins" menu and add the plugin by url: `https://github.com/mkavici/dotnetapps`

## Usage
- Click on **.Net Apps** on the Vesta Control panel tool bar; OR
- Visit the the '/plugin/dna' site on your Vesta Control panel. Ex. `http://example.com:8083/plugin/dna/`

https://docs.microsoft.com/en-us/aspnet/core/host-and-deploy/linux-nginx?view=aspnetcore-3.1
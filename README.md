# gist-proxy

Server-side proxy for rendering [GitHub Gists][1] when JavaScript is not available.


## Requirements

To run this script on your server, you simply need a webserver running [Apache][2] with [PHP][3] installed.


## Installation

Simply drop these files into a directory on your webserver and `gist-proxy` will be ready to go.


## Usage

Once you have installed this script on your server, it is immediately ready for use. Clients can call this script like this:

```
http://yourserver.com/gist-proxy/index.php?id=123456
```

The `id` query string parameter is the same ID value that you would find on GitHub Gists.

By default, this script creates a local cache of each Gist file for 14 days. If you want to force the script to re-download the Gist file, you can add the `force=true` query string parameter to the URL.

Local Gists are stored in the `gists/` directory in your installation directory of this script.

You can view a demo of this application <a href="http://gist-proxy.herokuapp.com/index.php?id=3621333">here</a>.


## Disclaimer

Use this script at your own risk. While this script has been tested thoroughly, on the above requirements, your mileage may vary. I take no responsibility for any harmful actions this script might cause.


## License

This software, and its dependencies, are distributed free of charge and licensed under the GNU General Public License v3. For more information about this license and the terms of use of this software, please review the LICENSE.txt file.

[1]: http://gist.github.com
[2]: http://www.apache.org/
[3]: http://www.php.net/

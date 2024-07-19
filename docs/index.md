Welcome to the [Digitized Medieval Manuscripts App (DMMapp)](https://digitizedmedievalmanuscripts.org/) Documentation!

This documentation provides a comprehensive guide to the DMMapp. It is intended for both developers and users.

In this guide, you will find information on how to fully utilize the DMMapp, including how to find institutions and
manuscripts, export data, and much more. You will also find instructions on how to install the app, should you wish to create your own project, as well as how
to contribute to the [DMMapp codebase](https://github.com/SexyCodicology/DMMapp-Digitized-Medieval-Manuscripts-app).

## About the DMMapp documentation

The DMMapp documentation is written in Markdown and compiled to HTML
using [Material for MkDocs](https://squidfunk.github.io/mkdocs-material/).
This documentation is hosted on GitHub Pages and can be
found [here](https://sexycodicology.github.io/DMMapp-Digitized-Medieval-Manuscripts-app/).
We use the official Material for MkDocs Docker image as it comes with all the required dependencies pre-installed and is
the easiest way to get started.

### Documentation guidelines

The DMMapp documentation follows the [Microsoft Manual of Style](https://docs.microsoft.com/en-us/style-guide/welcome/).
This style guide is used to ensure consistency across the documentation and to make it easier for users to find the
information they need.
Submitted pull requests could be edited to follow this style guide.

### Contributing to this documentation

Spotted a typo or want to add something to the documentation? Feel free to open a pull request or an issue on
the [DMMapp GitHub repository](https://github.com/SexyCodicology/DMMapp-Digitized-Medieval-Manuscripts-app).
We are always looking for ways to improve the documentation and welcome any contributions. Hereunder you can find
instructions on how to run the documentation locally, make changes, and see them live in your browser[^1].

!!! NOTE
    You do not need to install Docker, Material for MkDocs, or any dependencies on your local machine to contribute to this
    documentation. You can simply edit the Markdown files in the `docs` folder using your favorite text editor.

### Running the documentation locally

Assuming you have Docker installed on your local machine, follow these steps to run the documentation locally:

1. Clone the DMMapp repository to your local machine.
2. Run `docker run --rm -it -p 8000:8000 -v ${PWD}:/docs squidfunk/mkdocs-material` to start the MkDocs server.
3. Open `http://localhost:8000` in your browser.
4. Edit the Markdown files in the `docs` folder and see the changes live in your browser.
5. Press `Ctrl + C` to stop the server.

Should you have any issue running the documentation locally, please refer to
the [official Material for MkDocs documentation](https://squidfunk.github.io/mkdocs-material/).

[^1]: Refer to the [official Material for MkDocs documentation](https://squidfunk.github.io/mkdocs-material/) for more
detailed information on how to use MkDocs.

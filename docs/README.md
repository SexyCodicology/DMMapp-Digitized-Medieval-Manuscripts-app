# DMMapp - Documentation info

The DMMapp documentation uses [MkDocs](https://www.mkdocs.org/) with the [Material for MkDocs](https://squidfunk.github.io/mkdocs-material/) theme and plugins.

The preferred way to preview and build the documentation is using Docker:

```bash
docker pull squidfunk/mkdocs-material
```

## How do I preview the documentation?

If you are using Windows cmd, use the following command:
```bash
docker run --rm -it -p 8000:8000 -v "%cd%":/docs squidfunk/mkdocs-material
```
Else, if you are using Windows PowerShell, use the following command:
```bash
docker run --rm -it -v ${PWD}:/docs squidfunk/mkdocs-material build
```

Then open your browser and go to [http://localhost:8000](http://localhost:8000).

## How do i build the documentation?

```bash
docker run --rm -it -v "%cd%":/docs squidfunk/mkdocs-material build
```

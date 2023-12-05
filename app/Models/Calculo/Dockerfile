FROM python:3.10-alpine

RUN pip install Flask

COPY ./app.py .

EXPOSE 5000

CMD [ "flask","--app","app","run","--host","0.0.0.0","--port","5000"]

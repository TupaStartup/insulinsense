FROM python:3.10-alpine

RUN pip install Flask

COPY app/Models/Calculo .

CMD [ "flask","--app","app","run","--host","0.0.0.0","--port","5001"]

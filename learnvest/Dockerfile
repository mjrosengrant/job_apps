FROM ubuntu:latest
MAINTAINER Mike Rosengrant "mjrosengrant@yahoo.com"
RUN apt-get update -y
RUN apt-get install -y python-pip
COPY . /app
WORKDIR /app
RUN pip install -r requirements.txt

EXPOSE 80

ENTRYPOINT ["python"]
CMD ["app.py"]

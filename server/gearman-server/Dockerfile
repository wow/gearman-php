FROM debian:jessie

MAINTAINER ilham Deneri "ilhamdeneri@gmail.com"

ENV DEBIAN_FRONTEND noninteractive
RUN apt-get update && apt-get upgrade -y
RUN apt-get install -y --no-install-recommends locales && apt-get clean

RUN echo "Europe/Berlin" > /etc/timezone
RUN sed -i 's/# de_DE.UTF-8/de_DE.UTF-8/' /etc/locale.gen
RUN export LANG=de_DE.UTF-8
RUN dpkg-reconfigure locales
RUN dpkg-reconfigure tzdata

RUN apt-get install -y --no-install-recommends gearman-job-server && apt-get clean

RUN apt-get install coreutils

ADD init /usr/local/sbin/init
RUN chown root:root /usr/local/sbin/init && chmod 700 /usr/local/sbin/init

EXPOSE 4730

ENTRYPOINT ["/usr/local/sbin/init"]
CMD ["start"]
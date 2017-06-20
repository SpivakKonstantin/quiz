FROM centos:centos7

RUN yum -y update
RUN yum -y upgrade
RUN yum -y install wget
RUN cd /etc/yum.repos.d && wget https://repo.codeit.guru/codeit.el`rpm -q --qf "%{VERSION}" $(rpm -q --whatprovides redhat-release)`.repo
RUN yum -y install epel-release
RUN yum -y install nginx
RUN yum clean all
RUN rm -v /etc/nginx/nginx.conf
ADD configs/nginx.conf /etc/nginx
ADD configs/site.conf /etc/nginx/conf.d


COPY docker-entrypoint.sh /
RUN chmod +x /docker-entrypoint.sh

VOLUME /var/www

RUN ln -sf /dev/stdout /var/log/nginx/access.log 
RUN ln -sf /dev/stderr /var/log/nginx/error.log

EXPOSE 8080
ENTRYPOINT ["/docker-entrypoint.sh"]

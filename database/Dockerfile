FROM mysql:8.0.12

ADD ./st.sql /st.sql

RUN mysql -u user -puser skillmapper < /st.sql

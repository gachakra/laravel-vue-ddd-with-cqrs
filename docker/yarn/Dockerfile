FROM alpine:latest

MAINTAINER gachakra <gachakra.kangin@notonza.dev>


########################################################################
# set Timezone JST
RUN apk --update add tzdata \
    && cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime \
    && apk del tzdata \
    && rm -rf /var/cache/apk/*


########################################################################
# Libraries
RUN apk upgrade --update \
    && apk --no-cache add \
       bash \
       sudo \
       curl \
       vim \
       tini


########################################################################
# NPM & Yarn
RUN apk add --update nodejs nodejs-npm \
    && touch ~/.bashrc \
    && curl -o- -L https://yarnpkg.com/install.sh | ash \
    && ln -s "$HOME/.yarn/bin/yarn" /usr/local/bin/yarn


COPY docker-entrypoint.sh /docker-entrypoint.sh
ENTRYPOINT ["/bin/ash", "/docker-entrypoint.sh"]
CMD ["yarn"]

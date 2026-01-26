FROM ubuntu:22.04

ARG USERNAME
ARG USER_GROUP_NAME
ARG USER_UID
ARG USER_GID

# make server用に必要
ENV JAVA_HOME=/home/${USERNAME}/.sdkman/candidates/java/current
ENV PATH=$JAVA_HOME/bin:$PATH

ARG PKG="git vim curl unzip zip sudo"

SHELL ["/bin/bash", "-c"]

RUN apt-get update \
    && apt-get install -y ${PKG} \
    && groupadd --gid ${USER_GID} ${USER_GROUP_NAME} \
    && useradd --uid ${USER_UID} --shell /bin/bash --gid ${USER_GID} -m ${USERNAME} \
    && echo %${USER_GROUP_NAME} ALL=\(ALL\) NOPASSWD:ALL > /etc/sudoers.d/${USER_GROUP_NAME} \
    && chmod 0440 /etc/sudoers.d/${USER_GROUP_NAME}

ARG JAVA_VERSION=17.0.4-amzn
ARG GRADLE_VERSION=7.5

RUN su ${USERNAME} --command \
    'curl -s "https://get.sdkman.io" | bash \
    && source "${HOME}/.sdkman/bin/sdkman-init.sh" \
    && sdk install java "${JAVA_VERSION}" \
    && sdk install gradle "${GRADLE_VERSION}"'
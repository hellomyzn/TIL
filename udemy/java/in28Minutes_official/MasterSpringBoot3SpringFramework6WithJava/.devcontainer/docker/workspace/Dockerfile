FROM ubuntu:22.04

ARG USERNAME=vscode
ARG USER_GROUP_NAME=workspace
ARG USER_UID=1000
ARG USER_GID=1000

SHELL ["/bin/bash", "-c"]

ARG PKG="git vim curl unzip zip sudo"
RUN apt-get update \
    && apt-get install -y ${PKG} \
    && groupadd --gid ${USER_GID} ${USER_GROUP_NAME} \
    && useradd --uid ${USER_UID} --shell /bin/bash --gid ${USER_GID} -m ${USERNAME} \
    && echo %${USER_GROUP_NAME} ALL=\(ALL\) NOPASSWD:ALL > /etc/sudoers.d/${USER_GROUP_NAME} \
    && chmod 0440 /etc/sudoers.d/${USER_GROUP_NAME}

USER ${USERNAME}
WORKDIR /home/${USERNAME}

# make server用に必要
ENV SDKMAN_DIR=/home/${USERNAME}/.sdkman
ENV JAVA_HOME=/home/${USERNAME}/.sdkman/candidates/java/current
ENV MAVEN_HOME=/home/${USERNAME}/.sdkman/candidates/maven/current
ENV PATH=${JAVA_HOME}/bin:${MAVEN_HOME}/bin:${PATH}

ARG JAVA_VERSION=25-tem
ARG MAVEN_VERSION=3.9.9


# RUN su ${USERNAME} --command \
RUN curl -s "https://get.sdkman.io" | bash \
    && source "${HOME}/.sdkman/bin/sdkman-init.sh" \
    && sdk install java "${JAVA_VERSION}" \
    && sdk install maven "${MAVEN_VERSION}"
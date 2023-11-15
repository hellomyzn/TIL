FROM python:3.11

# middleware
USER root
RUN apt-get update && \
    apt-get -y upgrade && \
    apt-get install -y \
        curl \
        sudo \
        vim && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# add user
ARG USER_NAME=myzn
ARG GROUP_NAME=myzn
ARG UID=1000
ARG GID=1000
RUN groupadd -g ${GID} ${GROUP_NAME} && \
    useradd -lm -s /bin/bash -u ${UID} -g ${GID} -G sudo ${USER_NAME} && \
    echo "${USER_NAME}:password" | chpasswd && \
    echo "${USER_NAME} ALL=(ALL) NOPASSWD:ALL" >> /etc/sudoers
USER ${USER_NAME}

# poetry
ENV PATH /home/${USER_NAME}/.local/bin:$PATH
COPY --chown=${UID}:${GID} ./src/pyproject.toml /home/myzn/src/pyproject.toml
RUN curl -sSL https://install.python-poetry.org | python3 - && \
    poetry config virtualenvs.in-project true && \
    poetry -C $HOME/src/pyproject.toml install

# pip
# RUN python -m pip install --no-cache-dir --upgrade --user pip && \
    # pip install --no-cache-dir -r ${HOME}/src/requirements.txt

# # If you want to just run one command, use below
# COPY --chown=${UID}:${GID} ./docker-entrypoint.sh /docker-entrypoint.sh
# RUN chmod 755 /docker-entrypoint.sh
# ENTRYPOINT [ "/docker-entrypoint.sh" ]

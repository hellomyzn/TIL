import logging


logging.basicConfig(
    level=logging.WARNING,
)


class NoPassFilter(logging.Filter):
    def filter(self, record) -> bool:
        log_message = record.getMessage()
        return 'password' not in log_message


logger = logging.getLogger(__name__)
logger.addFilter(NoPassFilter())

logger.setLevel(logging.DEBUG)
logger.debug('logger debug')
logger.debug('logger debug password')

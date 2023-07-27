import logging


logging.basicConfig(
    level=logging.WARNING,
)

logging.critical('critical')
logging.error('error')
logging.warning('warning')
logging.info('info')
logging.debug('debug')

logger = logging.getLogger(__name__)
h = logging.FileHandler('testlog.log')
logger.addHandler(h)

logger.setLevel(logging.DEBUG)
logger.debug('logger debug')

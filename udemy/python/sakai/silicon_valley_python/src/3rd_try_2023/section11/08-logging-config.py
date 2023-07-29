import logging.config

logging.config.fileConfig('logging.ini')
logger = logging.getLogger('simpleExample')

logger.critical('critical')
logger.error('error')
logger.warning('warning')
logger.info('info')
logger.debug('debug')

import logging


formatter = '%(asctime)s %(levelname)s  %(message)s'
logging.basicConfig(
    level=logging.WARNING,
    format=formatter
)

logging.critical('critical')
logging.error('error')
logging.warning('warning')
logging.info('info')
logging.debug('debug')

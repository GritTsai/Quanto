import time
import DataProvider.SinaProvider

if __name__ == '__main__':
    s = DataProvider.SinaProvider.SinaProvider()
    for i in range(600000,604000):
        share = s.get_real_data(i)
        if share is None: continue
        print i, share.name, share.price,share.times

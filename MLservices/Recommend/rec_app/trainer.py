
import numpy as np
import mysql.connector as mysql
import pandas as pd


connection = mysql.connect(host='localhost', user='root', password='', database='we bake')

query = "SELECT itemid,itemname,itemdescription,category	 FROM productitem WHERE availability=1"
df = pd.read_sql(query, connection)
df["index"] = df.index 



def combine_features(row):
    return row['itemdescription'] + ' ' + row['itemname'] + ' ' + row['category']

def train(df=df):
    print("Training the model")
    from sklearn.feature_extraction.text import CountVectorizer
    from sklearn.metrics.pairwise import cosine_similarity

    cv = CountVectorizer()
    df['combined_features'] = df.apply(combine_features, axis=1)

    count_matrix = cv.fit_transform(df['combined_features'])
    cosine_sim = cosine_similarity(count_matrix)
    
    with open('output.txt', 'wb') as outfile:
        np.save(outfile, cosine_sim)



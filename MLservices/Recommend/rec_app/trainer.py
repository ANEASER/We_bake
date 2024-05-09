
def combine_features(row):
    return row['itemdescription'] + ' ' + row['itemname'] + ' ' + row['category']

def train(df):
    print("Training the model")
    from sklearn.feature_extraction.text import CountVectorizer
    from sklearn.metrics.pairwise import cosine_similarity
    import numpy as np
    import pandas as pd

    cv = CountVectorizer()
    df['combined_features'] = df.apply(combine_features, axis=1)

    count_matrix = cv.fit_transform(df['combined_features'])
    cosine_sim = cosine_similarity(count_matrix)
    
    with open('output.txt', 'wb') as outfile:
        np.save(outfile, cosine_sim)
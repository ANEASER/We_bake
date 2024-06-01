from tensorflow import keras
from keras.preprocessing.text import Tokenizer
from keras.utils import pad_sequences
from fastapi import FastAPI, HTTPException
from pydantic import BaseModel

app = FastAPI()

class InputData(BaseModel):
    text: str

max_words = 10000  # Maximum number of words in your vocabulary
max_len = 512  # Maximum length of input sequences

tokenizer = Tokenizer(num_words=max_words)


loaded_model = keras.models.load_model('sentiment-analysis.h5')


@app.get("/")
def read_root():
    return {"In the text classify app"}

@app.post("/predict/")
def predict(data: InputData):
    text = data.text
    text_seq = tokenizer.texts_to_sequences([text])
    text_pad = pad_sequences(text_seq, maxlen=max_len)
    y_pred_probs = loaded_model.predict(text_pad)
    y_pred = (y_pred_probs > 0.5).astype(int).flatten()

    if y_pred[0] == 1:
        return {"sentiment": "Positive"}
    else:
        return {"sentiment": "Negative"}

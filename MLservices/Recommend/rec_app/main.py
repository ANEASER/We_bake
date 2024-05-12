from fastapi import FastAPI, HTTPException
from pydantic import BaseModel
from typing import List, Optional
import recommender
import trainer

app = FastAPI()

class InputData(BaseModel):
    items: List[str]

@app.get("/")
def read_root():
    return {"Hello": "World"}

@app.get("/train/")
def train():
    trainer.train()
    return {"message": "Model trained successfully"}

@app.post("/recommend/")
def recommend(input_data: InputData):
    recommended_products = recommender.recommend(input_data.items)
    return recommended_products
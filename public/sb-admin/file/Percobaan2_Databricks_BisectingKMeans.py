from numpy import array
from math import sqrt
from pyspark import SparkContext
from pyspark.mllib.clustering import BisectingKMeans, BisectingKMeansModel

# Load and parse the data
sc = SparkContext(appName="KMeans")
data = sc.textFile("/FileStore/tables/output_positions_v2.csv")
parsedData = data.map(lambda line: array([float(x) for x in line.split(',')]))

# Build the model (cluster the data)
model = BisectingKMeans.train(parsedData, 9, maxIterations=5)

#Menncatat center dll
center = model.clusterCenters
cost = model.computeCost(parsedData)
print("Bisecting K-means Center = " + str(center))
print("Bisecting K-means Computer Cost = " + str(cost))
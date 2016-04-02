import json
from datetime import datetime, timedelta, date
from classes.DbHandle import DbHandle

class NetworthHandle():

	def __init__(self,dbName):
		self.dbHandle = DbHandle(dbName)

	#Provides a daily gapless networth time series, 
	#for a user, over a given date range based on individual account balances 
	def getNetWorths(self,startdate,enddate):

		start_date = datetime.strptime(startdate, "%Y-%m-%d") 
		end_date = datetime.strptime(enddate, "%Y-%m-%d") 

		output = []
		for single_date in self._daterange(start_date, end_date):
			output.append({ 
				"date": single_date.strftime("%Y-%m-%d"), 
				"net-worth":self._calculateNetWorth(single_date) 
				})

		return json.dumps(output)

	def _daterange(self, start_date, end_date):
	    for n in range(int ((end_date - start_date).days +1)):
	        yield start_date + timedelta(n)

	def _calculateNetWorth(self,date):
		dateFmted = date.strftime("%m/%d/%Y")

		#Get list of asset accounts and liability accounts
		assets = self.dbHandle.getAccounts("asset", date)
		liabilities = self.dbHandle.getAccounts("liability", date)

		assetTotal = 0
		liabilityTotal = 0
		
		for asset in assets:
			assetTotal += self.dbHandle.getBalanceOnClosestDate(asset, date)

		for liability in liabilities:
			liabilityTotal += self.dbHandle.getBalanceOnClosestDate(liability, date)

		networth = assetTotal - liabilityTotal 
		
		return networth

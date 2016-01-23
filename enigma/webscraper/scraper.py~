#TODO Write a script to scrape a sample site and output its data in JSON.
#edgar is a company listings site containing ten pages of company links. Each link endpoint holds 
#company-specific data such as name, description and address. The sole requirement of this part of the 
#test is to produce JSON of all of the company listings data for the site.

#Please attach a "solution.json" file of the parsed company listings data along with your solution code in your reply!

import json
import requests
from bs4 import BeautifulSoup

BASE_URL = "http://data-interview.enigmalabs.org/companies/"
pageParam = "?page="

PAGE_COUNT = 10

def main():
	solutionFile = open('solution.json', 'w')
	output = {}

	#Loops through each page and gets a list of companies
	for i in range(1, PAGE_COUNT+1):
		print "Processing Page " + str(i)

		table = getPageTable(i)
		companies = getCompaniesFromTable(table)
		
		#Loops through list of Companies and adds company data to output
		i = 0
		for j in range(len(companies)):
			print "output[" + str(len(output)) + "] = "+ companies[j]
			output[ len(output) ] = getCompanyData(companies[j])
			i=i+1

	#Writes output to File 
	print str(len(output)) + " Companies returned"
	solutionFile.write( prettyPrint(output) )

def getPageTable(pageNum):
	#Get list of companies on Page
	page_url = BASE_URL + pageParam + str(pageNum)
	response = requests.get(page_url)
	soup = BeautifulSoup(response.text, 'html.parser')
	return getTable(soup)

def getCompaniesFromTable(table):
	rows = table.find_all("tr")
	companyList = {}
	i=0
	for row in rows:
	    cells = row.find_all("td")
	    companyList[i] = cells[1].get_text().strip()
	    i=i+1

	return companyList

def getTable(soup):
	return soup.find("table").find("tbody")

def prettyPrint(dict):
	return json.dumps(dict,sort_keys=True, indent=4, separators=(',', ': '))

def getCompanyData(companyName):
	company_url = BASE_URL + companyName

	response = requests.get(company_url)
	soup = BeautifulSoup(response.text, 'html.parser')

	table = getTable(soup)
	companyDict = parseCompanyData(table)
	return companyDict

def parseCompanyData(table):
	rows = table.find_all("tr")
	company = {}
	for row in rows:
		cells = row.find_all("td")
		company[cells[0].get_text()] = cells[1].get_text()

	return company

main()

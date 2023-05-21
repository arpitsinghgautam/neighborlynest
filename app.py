from selenium import webdriver
from selenium.webdriver.common.by import By

driver = webdriver.Chrome()

# Open a website
driver.get("https://www.youtube.com/")

searchbox = driver.find_element(By.XPATH, '//*[@id="search"]')
searchbox.send_keys('Arpit Singh Gautam')

searchbutton = driver.find_element(By.XPATH, '//*[@id="search-icon-legacy"]')
searchbutton.click()

# Close the browser


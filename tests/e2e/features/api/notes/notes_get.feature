Feature: Notes endpoint
  Scenario: It receives a response from Notes endpoint
    When I send a "GET" request to "/api/v1/notes"
    Then the response status code should be 200